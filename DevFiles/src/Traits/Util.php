<?php

trait Util{
    
    /**
     * Função para converter datas do formato brasileiro
     * para o formato americano. Ela precisa receber uma
     * data no formato dd/mm/yyyy com hora opcional para
     * funcionar corretamente.
     * 
     * @param string $data
     * @return stirng
     */
    public function converte_data($data)
    {
     
        /*
         * Caso a data tenha horas, 
         * separa a data da hora.
         */
        $hora = '';
     
        if (strstr($data, ' ')) {
            $data = explode(' ', $data);
     
            $hora = $data[1];
            $data = $data[0];
        }
     
        /*
         * Reorganiza a data para ficar 
         * no padrão americano.
         * yyyy-mm-dd hh:mm:ss
         */
        $data = explode('/', $data);
        $data = array_reverse($data);
        $data = implode('-',$data);
     
        /*
         * Se a data possui hora,
         * a função retorna a data e hora.
         * Caso não exista hora,
         * retorna apenas a data
         */
        if ($hora != '') {
            return $data . ' ' . $hora;
        }
        else {
            return $data;
        }
    }
    /**
     * Função para calcular o limite de pontos
     * que podem ser consumidos por dia
     * @param string $sexo Sexo: 'MASCULINO' ou 'FEMININO'
     * @param float $peso Peso expresso em Kg
     * @param int $idade
     * @return int
     */
    public function defineLimitePontos($sexo, $peso, $idade)
    {
        switch ($sexo) {
            case 'MASCULINO':
                if($idade <= 50){
                    if ($peso <= 70) {
                        return 400;
                    } elseif ($peso > 70 and $peso <= 80) {
                        return 425;
                    } elseif ($peso > 80 and $peso <= 90) {
                        return 450;
                    } elseif ($peso > 90 and $peso <= 100) {
                        return 475;
                    } elseif ($peso > 100 and $peso <= 110) {
                        return 500;
                    } elseif ($peso > 110 and $peso <= 120) {
                        return 525;
                    } else {
                        return 550;
                    }
                } else {
                    if ($peso <= 70) {
                        return 380;
                    } elseif ($peso > 70 and $peso <= 80) {
                        return 405;
                    } elseif ($peso > 80 and $peso <= 90) {
                        return 430;
                    } elseif ($peso > 90 and $peso <= 100) {
                        return 455;
                    } elseif ($peso > 100 and $peso <= 110) {
                        return 480;
                    } elseif ($peso > 110 and $peso <= 120) {
                        return 505;
                    } else {
                        return 530;
                    }
                }
                break;
            
            case 'FEMININO':
                if($idade <= 50){
                    if ($peso <= 60) {
                        return 300;
                    } elseif ($peso > 60 and $peso <= 70) {
                        return 325;
                    } elseif ($peso > 70 and $peso <= 80) {
                        return 350;
                    } elseif ($peso > 80 and $peso <= 90) {
                        return 375;
                    } elseif ($peso > 100 and $peso <= 110) {
                        return 400;
                    } elseif ($peso > 110 and $peso <= 120) {
                        return 425;
                    } else {
                        return 450;
                    }
                } else {
                    if ($peso <= 60) {
                        return 280;
                    } elseif ($peso > 60 and $peso <= 70) {
                        return 305;
                    } elseif ($peso > 70 and $peso <= 80) {
                        return 330;
                    } elseif ($peso > 80 and $peso <= 90) {
                        return 355;
                    } elseif ($peso > 100 and $peso <= 110) {
                        return 380;
                    } elseif ($peso > 110 and $peso <= 120) {
                        return 405;
                    } else {
                        return 430;
                    }
                }
                break;
        }
    }
}
