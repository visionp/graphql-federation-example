import { ApolloServer } from '@apollo/server';
import { startStandaloneServer } from '@apollo/server/standalone';
// import {readFileSync} from "fs";
// const {buildSubgraphSchema} = require("@apollo/subgraph");
// import { parse } from "graphql";
const { ApolloGateway, IntrospectAndCompose, LocalGraphQLDataSource } = require('@apollo/gateway');

const gateway = new ApolloGateway({
    supergraphSdl: new IntrospectAndCompose({
        subgraphs: [
            { name: 'php', url: 'http://graphql-nginx:80/graphql' },
            { name: 'golang', url: 'http://graphql-golang:8080/graphql' },
        ],
    }),
});

const server = new ApolloServer({
    gateway,
});


async function initServer() {
    const { url } = await startStandaloneServer(server);
    console.log(`🚀  Server ready at ${url}`);
}

initServer();