<h2>Editar agenda do buffet</h2><br>
<form action="#">
    <label for="dias">Escolha uma dia da semana</label>
    <select name="dias" id="day">
      <option value="segunda">Segunda</option>
      <option value="terça">Terça</option>
      <option value="quarta">Quarta</option>
      <option value="quinta">Quinta</option>
      <option value="sexta">Sexta</option>
    </select><br><br>
    <label for="dias">Início</label>
    <select name="horario" id="time">
        <option value="segunda">8:00</option>
        <option value="terça">9:00</option>
        <option value="quarta">10:00</option>
      </select>

    <label for="dias">Término</label>
      <select name="horario" id="time">
        <option value="segunda">16:00</option>
        <option value="terça">17:00</option>
        <option value="quarta">18:00</option>
        <option value="quarta">19:00</option>
        <option value="quarta">20:00</option>
      </select>
    <input type="submit" value="Submit" />
</form>
<br><br>
<a href="{{  route('admindashboard')  }}">Dashboard</a>