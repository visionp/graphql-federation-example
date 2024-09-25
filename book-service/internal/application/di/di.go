package di

import (
	"graphql-golang/internal/application/api"
	"graphql-golang/internal/application/graphql"
	"graphql-golang/internal/domain/use_case"
	"graphql-golang/internal/infrastructure/repository"
	"net/http"
)

func NewHttpServer() *http.Server {
	bookRepository := repository.NewBookRepository()
	bookUseCase := use_case.NewBookUseCase(bookRepository)
	resolver := graphql.NewResolver(bookUseCase)
	srv := api.NewServer(resolver, nil)
	srv.Addr = ":8080"

	return srv
}
