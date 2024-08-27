package use_case

type PaymentUseCase struct{}

func NewPaymentUseCase() *PaymentUseCase {
	return &PaymentUseCase{}
}

func (u *PaymentUseCase) Payments() int {
	return 19
}
