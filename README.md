# graphql
GraphQL — це мова запитів для API та середовище виконання для 
 цих запитів. GraphQL надає повний і зрозумілий опис даних у вашому API, 
дає клієнтам можливість вимагати саме те, що їм потрібно, і нічого більше.
GraphQL був розроблений у великому старому Facebook у 2012 році (2015 open source).
# schema
Схема визначає систему типів. 
Вона описує множину можливих даних. Реквести від клієнта валідуються і виконуються згідно зі схемою. 
Клієнт може знайти інформацію про схему через інтроспекцію (якщо вона увімкнена).
# root types
Основні типи це Query, Mutation та Subscription.
Query використовуємо для наших запитів, Mutation для змін даних, а Subscription для реакції на події.
Приклад query в схемі:
```graphql
type Query @extends {
    getUsers(limit: Int): [User!]!
}
```

Приклад самого запиту:
```graphql
query {
    getUsers {
        id
        email
    }
}
```
Або в іншому варіанті з аргументом:
```graphql
{
    "operationName": "GetUsers",
    "variables": {
        "limit": 2
    },
    "query": "query GetUsers($limit: Int) { getUsers(limit: $limit) { id email createdAt } }"
}
```
Як результат тримаємо список користувачів з їх id та email.
## Анатомія запиту
<img src="./img/query anatomy.webp"/>

# resolvers
Резолвери це наший код що використовуюєся для виконання запитів.
# types
# scalar types
Скалярні типи це прості типи даних, які представляють собою одне значення.
Наприклад:
- Int: A signed 32‐bit integer.
- Float: A signed double-precision floating-point value.
- String: A UTF‐8 character sequence.
- Boolean: true or false.
- ID: The ID scalar type represents a unique identifier, often used to refetch an object or as the key for a cache. The ID type is serialized in the same way as a String; however, defining it as an ID signifies that it is not intended to be human‐readable.

Ми можемо створювати власні скалярні типи, це також допомагає частково валідувати вхідні дані. 
Як приклад я додав скаляр DateTime в схему user-service.
```
scalar DateTime
```
# resolvers
# directives
Директиви це спеціальні аннотації, які можна додати до схеми, щоб змінити поведінку запитів.
Деякі директиви вбудовані в GraphQL, наприклад @skip та @include, деякі специфічні для федерації, наприклад, деякі з них:
- @key
- @extends
- @external
- @requires

Також ми можемо створювати власні директиви.

# graphql-federation
# supergraph
# data loaders
# schema stitching
# schema composition
# persisted queries
# depth limit
# libraries
https://graphql.org/community/tools-and-libraries/



# links
https://www.apollographql.com/docs/federation/federated-schemas/composition
https://www.apollographql.com/docs/rover/commands/supergraphs/#yaml-configuration-file
https://www.apollographql.com/blog/9-ways-to-secure-your-graphql-api-security-checklist
https://github.com/apollographql/router
https://www.apollographql.com/docs/technotes/TN0021-graph-security/
https://www.apollographql.com/docs/router/
https://www.apollographql.com/docs/apollo-server/performance/apq/
https://gqlgen.com/reference/dataloaders/
https://evgeniy21.medium.com/%D0%B0%D0%BD%D0%B0%D1%82%D0%BE%D0%BC%D0%B8%D1%8F-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81%D0%B0-graphql-58e3aca51684

# Composer federation schema:

```docker build -t rover -f ./docker/rover/Dockerfile .```

```docker run -it --rm -v ./:/app rover```
