

# Wallet Project


#<u>Setup</u>

1. Update .env with the database credentials at your local machine.
2. Run `php artisan migrate` to populate data and schema.
3. Run `php artisan migrate:refresh --seed` for data and schema refresh.

#<u>Frontend</u>

The frontend can be viewed at http://127.0.0.1:8000

#<u>Admin API endpoints</u>

## Headers

`x-auth-key: Zioj23D92j2kGf9D,
Accept: application/json,
Content-Type: application/json`
	
## Wallet

### Retrieves a wallet with balance and latest 3 transactions

http://127.0.0.1:8000/api/admin/wallet/{email} (GET)

### Add a wallet

http://127.0.0.1:8000/api/admin/wallet (POST)

    {
    	"email": "​ryan@wallet.io"
    }

### Delete a wallet

http://127.0.0.1:8000/api/admin/wallet (DELETE)

    {
    	"email": "​ryan@wallet.io"
    }

#<u>Public API endpoints</u>

## Headers

`Accept: application/json,
Content-Type: application/json`
	
## Wallet

### Retrieves a wallet with balance and latest 3 transactions

http://127.0.0.1:8000/api/wallet/{email} (GET)

## Transaction

### Add credit transaction to a wallet

http://127.0.0.1:8000/api/transaction/add (POST)

    {
    	"email": "​ryan@wallet.io",
    	"amount": 590
    }


### Deduct credit transaction from a wallet

http://127.0.0.1:8000/api/transaction/deduct (POST)

    {
    	"email": "​ryan@wallet.io",
    	"amount": 20
    }



