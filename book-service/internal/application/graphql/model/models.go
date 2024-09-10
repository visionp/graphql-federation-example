package model

type Book struct {
	ID     string `json:"id"`
	Title  string `json:"title"`
	Author User   `json:"author"`
}

func (Book) IsEntity() {}

type Query struct {
}

type User struct {
	ID    string `json:"id"`
	Email string `json:"email"`
}

func (User) IsEntity() {}
