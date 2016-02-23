# codeigniter-enotas 0.0.1

**Atenção: esta biblioteca está em desenvolvimento e pode ser alterada a qualquer momento ***

Uma simples biblioteca para integrar aplicações em CodeIgniter com a API do E-notas Gateway

Para utilizar, basta editar o arquivo "nfe.php" com as informações da sua conta e ambiente desejado.

Exemplo (no controller):

```php
// Carregar biblioteca nota_fiscal
$this->load->library('nota_fiscal');

// Criar a array $nf com dados da compra e do usuário
$nf = array(
 'cliente' => array(
   'endereco' => array(
     'pais' => 'string',
     'uf' => 'string',
     'cidade' => 'string',
     'logradouro' => 'string',
     'numero' => 'string',
     'complemento' => 'string',
     'cep' => 'string',
    ),
   'tipoPessoa' => 'F',
   'nome' => 'string',
   'email' => 'string',
   'cpfCnpj' => 'string',
  ),
 'enviarPorEmail' => true,
 'tipo' => 'string',
 'servico' => array(
   'descricao' => 'string',
  ),
 'valorTotal' => 0,
);
// Gerar nota fiscal
$this->nota_fiscal->generate_nf($nf);
```

[Documentação E-notas Gateway](http://portal.enotasgw.com.br/knowledge-base/empresa-nota-fiscal-eletronica)
