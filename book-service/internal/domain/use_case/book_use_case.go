package use_case

import (
	"graphql-golang/internal/domain/entity"
	"graphql-golang/internal/domain/repository"
)

type BookUseCase struct {
	bookRepository repository.BookRepository
}

func NewBookUseCase(bookRepository repository.BookRepository) *BookUseCase {
	return &BookUseCase{bookRepository: bookRepository}
}

func (b *BookUseCase) FindAll() ([]*entity.Book, error) {
	return b.bookRepository.FindAll()
}

func (b *BookUseCase) FindByID(id string) (*entity.Book, error) {
	return b.bookRepository.FindByID(id)
}

func (b *BookUseCase) Remove(id string) error {
	return b.bookRepository.Remove(id)
}
