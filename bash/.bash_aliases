# Easier navigation: .., ..., ...., ....., ~ and -
alias ..="cd .."
alias ...="cd ../.."
alias ....="cd ../../.."
alias .....="cd ../../../.."

# Shortcuts
alias g="git"
alias h="history"

# Testing tools
alias behat="vendor/bin/behat"
alias phpspec="vendor/bin/phpspec"
alias phpunit="vendor/bin/phpunit"

# Symfony console
alias prod="bin/console --env=prod"
alias dev="bin/console --env=dev"
alias sf="bin/console"

# Edit hosts file
alias hosts='sudo $EDITOR /etc/hosts'
