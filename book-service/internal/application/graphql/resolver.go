package graphql

import "graphql-golang/internal/domain/use_case"

type Resolver struct {
	PaymentUseCase *use_case.PaymentUseCase
}

func NewResolver(paymentUseCase *use_case.PaymentUseCase) *Resolver {
	return &Resolver{
		PaymentUseCase: paymentUseCase,
	}
}
