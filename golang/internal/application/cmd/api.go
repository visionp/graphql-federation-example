package cmd

import (
	"github.com/spf13/cobra"
	"graphql-golang/internal/application/di"
)

var apiCommand = &cobra.Command{
	Use:   "api",
	Short: "API for serve http requests",
	RunE: func(cmd *cobra.Command, args []string) error {
		srv := di.NewHttpServer()
		return srv.ListenAndServe()
	},
}

func init() {
	rootCmd.AddCommand(apiCommand)
}
