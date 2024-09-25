package repository

import (
	"graphql-golang/internal/domain/entity"
)

type BookRepository struct {
	storage []*entity.Book
}

func NewBookRepository() *BookRepository {
	storage := []*entity.Book{
		{
			ID:       "1",
			Title:    "Book 1",
			IdAuthor: "1",
		},
		{
			ID:       "2",
			Title:    "Book 2",
			IdAuthor: "2",
		},
		{
			ID:       "3",
			Title:    "Book 3",
			IdAuthor: "2",
		},
		{
			ID:       "4",
			Title:    "Book 4",
			IdAuthor: "4",
		},
		{
			ID:       "5",
			Title:    "Book 5",
			IdAuthor: "4",
		},
		{
			ID:       "6",
			Title:    "Book 6",
			IdAuthor: "4",
		},
		{
			ID:       "7",
			Title:    "Book 7",
			IdAuthor: "5",
		},
	}
	return &BookRepository{storage: storage}
}

func (b *BookRepository) FindAll() ([]*entity.Book, error) {
	return b.storage, nil
}

func (b *BookRepository) FindByID(id string) (*entity.Book, error) {
	for _, book := range b.storage {
		if book.ID == id {
			return book, nil
		}
	}
	return nil, nil
}

func (b *BookRepository) FindByAuthorID(id string) ([]*entity.Book, error) {
	var result []*entity.Book
	for _, book := range b.storage {
		if book.IdAuthor == id {
			result = append(result, book)
		}
	}

	return result, nil
}

func (b *BookRepository) Remove(id string) error {
	for i, book := range b.storage {
		if book.ID == id {
			b.storage = append(b.storage[:i], b.storage[i+1:]...)
			return nil
		}
	}
	return nil
}
