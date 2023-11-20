<h3>Pesquisa de Satisafação</h3>

<form action="{{ route('pesquisa.store') }}" method="post">
    @csrf
    <p>O que achou do nosso espaço?</p>
      <input type="radio" name="questao_1" value="Ótimo" required> Ótimo <br>
      <input type="radio" name="questao_1" value="Bom" required> Bom <br>
      <input type="radio" name="questao_1" value="Médio" required> Médio <br>
      <input type="radio" name="questao_1" value="Ruim" required> Ruim <br>
      <input type="radio" name="questao_1" value="Péssimo" required> Péssimo <br>

    <p>O que achou da nossa comida?</p>
        <input type="radio" name="questao_2" value="Ótima" required> Ótima <br>
        <input type="radio" name="questao_2" value="Boa" required> Boa <br>
        <input type="radio" name="questao_2" value="Média" required> Média <br>
        <input type="radio" name="questao_2" value="Ruim" required> Ruim <br>
        <input type="radio" name="questao_2" value="Péssima" required> Péssima <br>

    <p>O que achou do nosso atendimento?</p>
        <input type="radio" name="questao_3" value="Ótimo" required> Ótimo <br>
        <input type="radio" name="questao_3" value="Bom" required> Bom <br>
        <input type="radio" name="questao_3" value="Médio" required> Médio <br>
        <input type="radio" name="questao_3" value="Ruim" required> Ruim <br>
        <input type="radio" name="questao_3" value="Péssimo" required> Péssimo <br>

    <p>O que achou do nosso site?</p>
        <input type="radio" name="questao_4" value="Ótimo" required> Ótimo <br>
        <input type="radio" name="questao_4" value="Bom" required> Bom <br>
        <input type="radio" name="questao_4" value="Médio" required> Médio <br>
        <input type="radio" name="questao_4" value="Ruim" required> Ruim <br>
        <input type="radio" name="questao_4" value="Péssimo" required> Péssimo <br>

    <p>Deixe aqui seu comentário ou sugestão</p>
        <input type="text" name="pesquisa" value="" required>

        <input type="hidden" name="festaId" value="{{ $festaId }}">
        <input type="hidden" name="status" value=5>

    <p>Obrigada por sua preferência!</p>

      <input type="submit" value="Enviar">
  </form>

