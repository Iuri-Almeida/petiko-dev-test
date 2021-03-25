<?php
/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

A classe LeagueTablr acompanha o score de cada jogador em uma liga. Depois de cada jogo, o score do jogador é salvo utilizanod a função recordResult.

O Rank de jogar na liga é calculado utilizando a seguinte lógica:

1- O jogador com a pontuação mais alta fica em primeiro lugar. O jogador com a pontuação mais baixa fica em último.
2- Se dois jogadores estiverem empatados, o jogador que jogou menos jogos é melhor posicionado.
3- Se dois jogadores estiverem empatados na pontuação e no número de jogos disputados, então o jogador que foi o primeiro na lista de jogadores é classificado mais alto.


Implemente a funação playerRank que retorna o jogador de uma posição escolhida do ranking.

Exemplo:

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);


Todos os jogadores têm a mesma pontuação. No entanto, Arnold e Chris jogaram menos jogos do que Mike, e como Chris está acima de Arnold na lista de jogadores, ele está em primeiro lugar.

Portanto, o código acima deve exibir "Chris".


*/

class LeagueTable
{
	public function __construct($players)
    {
		$this->standings = array();
		foreach($players as $index => $p)
        {
			$this->standings[$p] = array
            (
                'index' => $index,
                'games_played' => 0, 
                'score' => 0
            );
        }
	}
		
	public function recordResult($player, $score)
    {
		$this->standings[$player]['games_played']++;
		$this->standings[$player]['score'] += $score;
	}
	
	public function playerRank($rank)
    {
        // definindo o número máximo de jogadores
        $maxPlayers = count($this->standings);

        // verificando se foi digitado um número maior que o máximo de jogadores
        if ($rank > $maxPlayers) { return E_ERROR; }

        foreach ($this->standings as $player => $info) {

            // adicionando o nome do jogador junto com suas informações
            $info['name'] = $player;

            // se for o primeiro, adicionar ao ranking
            if (!$ranking) { $ranking[] = $info; }

            else {

                $position = 0;

                foreach ($ranking as $infoRank) {

                    // definindo as condições do rank
                    $hasBiggerScore = $info['score'] > $infoRank['score'];
                    $hasEqualScore = $info['score'] == $infoRank['score'];
                    $hasLessGames = $info['games_played'] < $infoRank['games_played'];

                    if (($hasBiggerScore) or ($hasEqualScore and $hasLessGames)) {

                        // definindo o jogador que será adicionado
                        $playerToBeAdded = array($player => $info);

                        // colocando o player antes do playerRank
                        array_splice($ranking, $position, 0, $playerToBeAdded);

                        break;
                    }

                    // se for a última posição, adicionar o jogador ao final do array
                    if ($position == count($ranking) - 1) { $ranking[$player] = $info; }

                    $position++;
                }
            }
        }

        // definindo o jogador que foi procurado
        $soughtPlayer = $ranking[$rank - 1]['name'];

        return $soughtPlayer;
	}
}
      
$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);