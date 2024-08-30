package api

import (
	graph "github.com/99designs/gqlgen/graphql"
	"github.com/99designs/gqlgen/graphql/handler"
	"github.com/gorilla/mux"
	"graphql-golang/internal/application/graphql"
	"graphql-golang/internal/application/graphql/generated"
	"net/http"
)

func NewServer(
	resolver *graphql.Resolver,
	extensions []graph.HandlerExtension,
) *http.Server {
	router := mux.NewRouter()

	router.
		Handle("/graphql", gqlHandler(resolver, extensions)).
		Methods(http.MethodPost, http.MethodGet)

	return &http.Server{
		Addr:    ":8080",
		Handler: router,
	}
}

func gqlHandler(
	resolver *graphql.Resolver,
	extensions []graph.HandlerExtension,
) http.Handler {
	gqlCfg := generated.Config{
		Resolvers: resolver,
	}

	schema := generated.NewExecutableSchema(gqlCfg)
	srv := handler.NewDefaultServer(schema)
	for _, extension := range extensions {
		srv.Use(extension)
	}

	return srv
}
