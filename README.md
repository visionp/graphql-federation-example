# graphql
GraphQL — це мова запитів для API та середовище виконання для 
 цих запитів. GraphQL надає повний і зрозумілий опис даних у вашому API, 
дає клієнтам можливість вимагати саме те, що їм потрібно, і нічого більше.
# schema
Схема визначає систему типів. 
Вона описує множину можливих даних. Реквести від клієнта валідуються і виконуються згідно зі схемою. 
Клієнт може знайти інформацію про схему через інтроспекцію (якщо вона увімкнена).
# root types
# types
# scalar types
# resolvers
# directives
# graphql-federation
# supergraph
# data loaders
# schema stitching
# schema composition
# persisted queries
# depth limit



# links
https://www.apollographql.com/docs/federation/federated-schemas/composition
https://www.apollographql.com/docs/rover/commands/supergraphs/#yaml-configuration-file
https://www.apollographql.com/blog/9-ways-to-secure-your-graphql-api-security-checklist
https://github.com/apollographql/router
https://www.apollographql.com/docs/technotes/TN0021-graph-security/
https://www.apollographql.com/docs/router/
https://www.apollographql.com/docs/apollo-server/performance/apq/
https://gqlgen.com/reference/dataloaders/

# Composer federation schema:

```docker build -t rover -f ./docker/rover/Dockerfile .```

```docker run -it --rm -v ./:/app rover```
