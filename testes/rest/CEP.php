<?php


/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

Postmon é uma API para consultar CEP e encomendas de maneira fácil.

Implemente uma função que recebe CEP e retorna todos os dados reltivos ao endereço correspondente.

Exemplo:

getAddressByCep('13566400') retorna:
{
	"bairro": "Vila Marina",
	"cidade": "São Carlos",
	"logradouro": "Rua Francisco Maricondi",
	"estado_info": {
	"area_km2": "248.221,996",
	"codigo_ibge": "35",
		"nome": "São Paulo"
	},
	"cep": "13566400",
	"cidade_info": {
		"area_km2": "1136,907",
		"codigo_ibge": "3548906"
	},
	"estado": "SP"
}



Documentação:
https://postmon.com.br/


*/

class CEP
{
    public static function getAddressByCep($cep)
    {
		try {
			// definindo a url da API
			$apiURL = "https://api.postmon.com.br/v1/cep/$cep";
			
			// iniciando a sessão do cURL
			$ch = curl_init($apiURL);

			// definindo opções para retornar o conteúdo como uma string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			// pegando a resposta
			$response = curl_exec($ch);

			// fechando a sessão do cURL
			curl_close($ch);

			// armazenando no formato de JSON e forçando ser uma lista
			$responseJSON = json_decode($response, true);

			return $responseJSON;
		} catch (Exception $e) {
			
			// tratar o erro
			return ;
		}
    }
}


var_dump(CEP::getAddressByCep($cep));