// @ts-ignore
import {ApolloServer} from '@apollo/server';
// @ts-ignore
import {startStandaloneServer} from '@apollo/server/standalone';
import {GraphQLRequest} from 'apollo-server-core';
import { depthLimit } from "@graphile/depth-limit";
const {ApolloGateway, IntrospectAndCompose, RemoteGraphQLDataSource} = require('@apollo/gateway');
import { InMemoryLRUCache } from '@apollo/utils.keyvaluecache';


const gateway = new ApolloGateway({
    supergraphSdl: new IntrospectAndCompose({
        subgraphs: [
            {name: 'user-service', url: 'http://user-service-nginx:80/graphql'},
            {name: 'book-service', url: 'http://book-service:8080/graphql'},
        ],
    }),
    introspection: true,
    playground: {
        settings: {
            'editor.theme': 'light',
        },
    },
    buildService: ({name, url}: { name: string, url: string }) => {
        return new RemoteGraphQLDataSource({
            url,
            willSendRequest({request, context}: { request: GraphQLRequest, context: any }) {
                if (request.http && request.http.headers) {
                    request.http.headers.set('x-service-name', 'TEST_APOLLO');
                    if (context.user) {
                        request.http.headers.set('x-token', context.user.token);
                        request.http.headers.set('x-id-user', context.user.id);
                        request.http.headers.set('x-name-user', context.user.name);
                        request.http.headers.set('x-roles-user', context.user.roles);
                    }
                }
            }
        });
    },
});

const server = new ApolloServer({
    gateway,
    validationRules: [depthLimit({maxDepth: 3})],
    persistedQueries:{
        cache: new InMemoryLRUCache(),
        ttl: 600,
    },
});

// @ts-ignore
async function initServer() {
    const {url} = await startStandaloneServer(server, {
        context: async ({req, res}) => {
            const token = req.headers.authorization || '';
            let user = adminRepo[token] || null;
            return {user: user};
        },
    });
}

let adminRepo: { [key: string]: { id: number, name: string, roles: string[]} } = {
    "a": {id: 1, name: 'John Doe', roles: ['user']},
    "b": {id: 2, name: 'dr. Who', roles: ['admin']},
    "c": {id: 2, name: 'Anna', roles: ['user', 'admin']},
};

initServer();