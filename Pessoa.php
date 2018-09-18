<?php include '../View/template/header.php'; ?>
<?php include '../View/template/menu.php'; ?>
<?php require_once '../DAO/PessoaDao.php'; ?>

<h1>Pessoas</h1>

<table class="table table-bordered table-inverse">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>NOME</th>
            <th>EMAIL</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $dao = new PessoaDao();
                $pessoas = $dao->lista();
                foreach($pessoas as $p){
                    ?>
                    <tr>
                        <td scope="row"><?= $p->getId(); ?></td>
                        <td><?= $p->getNome(); ?></td>
                        <td><?= $p->getEmail(); ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editar<?=$p->getId(); ?>">
                              Editar
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="editar<?=$p->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="\wnep\controller\Pessoa_editar.php?id=<?=$p->getId(); ?>" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="modelTitleId">Editar</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nome</label>
                                                <input value="<?= $p->getNome(); ?>" type="text" class="form-control" name="txtNome" id="txtNome" aria-describedby="helpId" placeholder="Nome">
                                            </div>

                                            <div class="form-group">
                                                <label for="">EMail</label>
                                                <input value="<?= $p->getEmail(); ?>" type="email" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelpId" placeholder="EMail">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cadastro">
  Cadastrar
</button>

<!-- Modal -->
<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="\wnep\controller\Pessoa_cadastro.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modelTitleId">Cadastrar</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="txtNome" id="txtNome" aria-describedby="helpId" placeholder="Nome">
                    </div>

                    <div class="form-group">
                        <label for="">EMail</label>
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelpId" placeholder="EMail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../View/template/footer.php'; ?>