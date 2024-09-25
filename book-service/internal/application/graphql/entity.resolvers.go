package graphql

// This file will be automatically regenerated based on the schema, any resolver implementations
// will be copied through when generating and any unknown code will be moved to the end.
// Code generated by github.com/99designs/gqlgen version v0.17.49

import (
	"context"
	"graphql-golang/internal/application/graphql/generated"
	"graphql-golang/internal/application/graphql/model"
	"graphql-golang/internal/domain/entity"
)

// FindBookByID is the resolver for the findBookByID field.
func (r *entityResolver) FindBookByID(ctx context.Context, id string) (*model.Book, error) {
	books, err := r.bookUseCase.FindByID(id)
	return mapBookToType(books), err
}

// FindUserByID is the resolver for the findUserByID field.
func (r *entityResolver) FindUserByID(ctx context.Context, id string) (*model.User, error) {
	return &model.User{
		ID: id,
	}, nil
}

// Entity returns generated.EntityResolver implementation.
func (r *Resolver) Entity() generated.EntityResolver { return &entityResolver{r} }

type entityResolver struct{ *Resolver }

// !!! WARNING !!!
// The code below was going to be deleted when updating resolvers. It has been copied here so you have
// one last chance to move it out of harms way if you want. There are two reasons this happens:
//   - When renaming or deleting a resolver the old code will be put in here. You can safely delete
//     it when you're done.
//   - You have helper methods in this file. Move them out to keep these resolver files clean.
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
