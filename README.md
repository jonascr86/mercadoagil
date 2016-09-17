## Configurações de desenvolvimento

### Iniciando um projeto

Para iniciar um projeto é necessário primeiramente configurar a chave SSH, [veja mais aqui](https://confluence.atlassian.com/bitbucket/set-up-ssh-for-git-728138079.html).

Logo após, basta clonar o projeto:

```
$ git clone git@bitbucket.org:rettati/sofiatri.git
```

Seguindo... É necessário instalar todas as dependências PHP do projeto:

```
$ composer install
```

Posteriormente é necessário criar o database no Postgres e configurar o arquivo `.env` com as configurações de acesso ao banco.

Por fim basta rodar a migrations, gerar key e os executar as seeders:

```
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```

### Coding style and standards

O projeto inclui um arquivo `.editorconfig`, lá já estão configuradas algumas regras de formatação de arquivos. Para funcionar é necessário o [plugin](http://editorconfig.org/) para seu editor.

O projeto segue as seguintes PSRs definidas pela PHP-FIG a respeito da formatação do código:

* [PSR-1](http://www.php-fig.org/psr/psr-1/)
* [PSR-2](http://www.php-fig.org/psr/psr-2/)
