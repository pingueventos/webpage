@extends('anivers.layouts.app')

@section('content')

<div class="header">
        <img src="/css/images_css/logo.png" id="logo">
</div>

<div class="corpo_pesquisa">
    <h3>Pesquisa de Satisfação</h3><br>
    
    
        <form action="{{ route('pesquisa.store') }}" method="post">
            @csrf
        <div class="posicao_pesq">
            <div class="boxpesquisa">
                <p>O que achou do nosso espaço?</p>
                  <input type="radio" name="questao_1" value="Ótimo" required> Ótimo <br>
                  <input type="radio" name="questao_1" value="Bom" required> Bom <br>
                  <input type="radio" name="questao_1" value="Médio" required> Médio <br>
                  <input type="radio" name="questao_1" value="Ruim" required> Ruim <br>
                  <input type="radio" name="questao_1" value="Péssimo" required> Péssimo <br>
            </div>
        
            <div class="boxpesquisa">
                <p>O que achou da nossa comida?</p>
                    <input type="radio" name="questao_2" value="Ótima" required> Ótima <br>
                    <input type="radio" name="questao_2" value="Boa" required> Boa <br>
                    <input type="radio" name="questao_2" value="Média" required> Média <br>
                    <input type="radio" name="questao_2" value="Ruim" required> Ruim <br>
                    <input type="radio" name="questao_2" value="Péssima" required> Péssima <br>
            </div>
        
            <div class="boxpesquisa">
                <p>O que achou do nosso atendimento?</p>
                    <input type="radio" name="questao_3" value="Ótimo" required> Ótimo <br>
                    <input type="radio" name="questao_3" value="Bom" required> Bom <br>
                    <input type="radio" name="questao_3" value="Médio" required> Médio <br>
                    <input type="radio" name="questao_3" value="Ruim" required> Ruim <br>
                    <input type="radio" name="questao_3" value="Péssimo" required> Péssimo <br>
            </div>

        </div>
        
        <div class="posicao_pesq2">
                <div class="boxpesquisa">
                    <p>O que achou do nosso site?</p>
                        <input type="radio" name="questao_4" value="Ótimo" required> Ótimo <br>
                        <input type="radio" name="questao_4" value="Bom" required> Bom <br>
                        <input type="radio" name="questao_4" value="Médio" required> Médio <br>
                        <input type="radio" name="questao_4" value="Ruim" required> Ruim <br>
                        <input type="radio" name="questao_4" value="Péssimo" required> Péssimo <br>
                </div>
                <div class="boxpesquisa">
                    <p>Deixe aqui seu comentário ou sugestão</p>
                        <input type="text" name="pesquisa" value="" maxlength="255">
                        <input type="hidden" name="festaId" value="{{ $festaId }}">
                        <input type="hidden" name="status" value=5>
                </div>
        </div>
        

            
            <div>
                <p>Obrigada por sua preferência!</p>
                  <input type="submit" value="Enviar">
                      </form><br><br>
            </div>
    
        
</div>

      <a href="{{  route('aniversdashboard')  }}" id="logout">Dashboard</a> <br><br>
</div>

