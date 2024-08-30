package di

import (
	"graphql-golang/internal/application/api"
	"graphql-golang/internal/application/graphql"
	"graphql-golang/internal/domain/use_case"
	"net/http"
)

func NewHttpServer() *http.Server {
	paymentsUseCase := use_case.PaymentUseCase{}
	resolver := graphql.NewResolver(&paymentsUseCase)
	srv := api.NewServer(resolver, nil)
	srv.Addr = ":8080"

	return srv
}
