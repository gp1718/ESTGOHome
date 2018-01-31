<div class="container">
  <h2>Lista de anúncios</h2>

  <!--LISTAR E EDITAR-->
  <div class="row table-responsive">
    <div class="col">
      <br><br>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Senhorio</th>
            <th>Responsável</th>
            <th>Localização</th>
            <th>Disponibilidade</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">Nome Sobrenome</a></td>
            <td>Nome Sobrenome</td>
            <td>Rua nº1, 1111-1111 Localização</td>
            <td>Indisponível</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-success btn-xs" href="#" type="button" onclick="toggle(this)">Ativar <i class="fa fa-check" aria-hidden="true"></i></button>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td><a href="#">Nome Sobrenome</a></td>
            <td>Nome Sobrenome</td>
            <td>Rua nº2, 1111-1111 Localização</td>
            <td>Disponível</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-danger btn-xs" href="#" type="button" onclick="toggle(this)">Inativar <i class="fa fa-times" aria-hidden="true"></i></button>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td><a href="#">Nome Sobrenome</a></td>
            <td>Nome Sobrenome</td>
            <td>Rua nº3, 1111-1111 Localização</td>
            <td>Por aprovar</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-warning btn-xs" href="#" type="button" onclick="consider(this)">Qualificar <i class="fa fa-book" aria-hidden="true"></i></button>
                </span>
              </div>
            </td>
          </tr>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
  </div>
  <hr>
</div>