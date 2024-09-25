package repository

import (
	"graphql-golang/internal/domain/entity"
)

type BookRepository interface {
	FindAll() ([]*entity.Book, error)
	FindByID(id string) (*entity.Book, error)
	Remove(id string) error
	FindByAuthorID(id string) ([]*entity.Book, error)
}
