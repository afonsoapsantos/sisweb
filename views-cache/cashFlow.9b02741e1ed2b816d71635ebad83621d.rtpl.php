<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="page-admin-cashFlow">

    <div class="container">
        <aside>
            <div class="vertical-menu">
                <a href="" class="item">Fluxo de Caixa</a>
                <a href="" class="item">Movimento de Caixa</a>
                <a href="" class="item">DRE</a>
                <a href="" class="item">BP - Balanço Patrimonial</a>
            </div>
        </aside>
        <main>
            <section>
                <h2>Fluxo de Caixa</h2>

                <table id="cashFlow">
                    <thead>
                        <tr>
                            <th>Janeiro</th>
                            <th>Fevereiro</th>
                            <th>Março</th>
                            <th>Abril</th>
                            <th>Maio</th>
                            <th>Junho</th>
                            <th>Julho</th>
                            <th>Agosto</th>
                            <th>Setembro</th>
                            <th>Outubro</th>
                            <th>Novembro</th>
                            <th>Dezembro</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter1=-1;  if( isset($data) && ( is_array($data) || $data instanceof Traversable ) && sizeof($data) ) foreach( $data as $key1 => $value1 ){ $counter1++; ?>

                            <tr>
                                <td></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </section>
        </main>
    </div>

</div>