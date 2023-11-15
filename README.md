## Requisitos para primeira execução:
   > - Docker instalado e em execução na máquina destino;<br>
   > - Conexão com a internet (para baixar os arquivos);<br>
   > - Acesso a alguma linha de comando (CLI);<br>
   > - Acesso a algum web browser.<br>

# Passo a passo
Clone o repositório no diretório desejado da sua máquina através da CLI
```sh
git clone -b features-iniciais https://github.com/pingueventos/webpage pingu-webpage
```

Acesse o diretório clonado através da CLI
```sh
cd pingu-webpage
```

Crie um arquivo para as variáveis de ambiente através da CLI
```sh
cp .env.generationfile .env
```

Defina suas informações de login dentro do arquivo .env adicionando as informações nas linhas (após o "=")
```sh
# Adicione o nome de usuário da sua base de dados
DB_USERNAME=
# Adicione a senha da sua base de dados
DB_PASSWORD=
```

Confira os emails e defina suas senhas para as contas primárias em /database/seeders/UserSeeder.php adicionando as informações na linhas (entre o "('')")
```sh
# Defina a senha do usuário teste aniversariante
                'password' => Hash::make(''),
                
# Defina a senha do usuário administrativo
                'password' => Hash::make(''),

# Defina a senha do usuário operacional
                'password' => Hash::make(''),

# Defina a senha do usuário comercial
                'password' => Hash::make(''),
```

Suba os containers do projeto através da CLI
```sh
docker compose up -d
```

Acesse a CLI do container principal
```sh
docker compose exec app bash
```

> Instale as dependências do projeto
> ```sh
> composer install
> ```
> 
> Gere a chave do seu projeto
> ```sh
> php artisan key:generate
> ```
>
> Crie as tabelas no banco de dados
> ```sh
> php artisan migrate
> ```
>
> Adicione os usuários primários no banco de dados
> ```sh
> php artisan db:seed --class=UserSeeder
> ```

Descomente as linhas a seguir do arquivo /app/Providers/AppServiceProvider.php (apague as '//')

```sh
# Descomente as duas linhas abaixo        
//        $solicitacao=DB::table('solicitacoes')->get();
//        View::share('solicitacoes', $solicitacao);
```


Acesse o projeto acessando o link abaixo em algum web browser<br>
[http://localhost:1606](http://localhost:1606)