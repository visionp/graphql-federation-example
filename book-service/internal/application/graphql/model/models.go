package model

type Query struct {
}

type Book struct {
	ID     string `json:"id"`
	Title  string `json:"title"`
	Author *User  `json:"author"`
}

func (Book) IsEntity() {}
