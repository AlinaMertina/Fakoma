<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Present employee </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <?php if (isset($liste)) {
                            for ($i = 0; $i < count($liste); $i++) { ?>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"><?= $liste[$i]['prenom_employer'] ?></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Debut travaille</td>
                                            <td>Fin Travaille</td>
                                            <td>Debut Pause</td>
                                            <td>Fin Pausse</td>
                                        </tr>
                                        <tr>
                                            <td><?= $liste[$i]['t_debut'] ?></td>
                                            <td><?= $liste[$i]['t_fin'] ?></td>
                                            <td><?= $liste[$i]['p_debut'] ?></td>
                                            <td><?= $liste[$i]['p_fin'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>