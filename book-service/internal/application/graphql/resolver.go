package graphql

import (
	"graphql-golang/internal/application/graphql/model"
	"graphql-golang/internal/domain/entity"
	"graphql-golang/internal/domain/use_case"
)

type Resolver struct {
	bookUseCase *use_case.BookUseCase
}

func NewResolver(bookUseCase *use_case.BookUseCase) *Resolver {
	return &Resolver{
		bookUseCase: bookUseCase,
	}
}

func mapBookToType(book *entity.Book) *model.Book {
	return &model.Book{
		ID:    book.ID,
		Title: book.Title,
		Author: model.User{
			ID: book.IdAuthor,
		},
	}
}

func mapBooksToTypes(books []*entity.Book) []*model.Book {
	var result []*model.Book
	for _, book := range books {
		result = append(result, mapBookToType(book))
	}
	return result
}
