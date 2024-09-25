package graphql

import "graphql-golang/internal/domain/use_case"

type Resolver struct {
	bookUseCase *use_case.BookUseCase
}

func NewResolver(bookUseCase *use_case.BookUseCase) *Resolver {
	return &Resolver{
		bookUseCase: bookUseCase,
	}
}
