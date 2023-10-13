<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <!-- Aqui Começa o menu lateral -->
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-home-outline"></i><span
                        class="hide-menu">Inicio</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                    <li class="sidebar-item"><a href="listaramais.php" class="sidebar-link"><i
                                class="mdi mdi-phone-classic"></i><span class="hide-menu"> Lista Ramais
                            </span></a></li>
                    <li class="sidebar-item"><a href="relatoriovisita.php" class="sidebar-link"><i
                                class="mdi mdi-file-outline"></i><span class="hide-menu"> Relatório Visita
                            </span></a></li>
                    <li class="sidebar-item"><a href="http://webmail.cragea.com.br/" class="sidebar-link" target="_blank"><i
                                class="mdi mdi-gmail"></i><span class="hide-menu"> WebMail
                            </span></a></li>
                </ul>
            </li>
            <?php
                            if ($_SESSION['tipo'] != 4) {
                                print "
                <li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark'
                        href='javascript:void(0)' aria-expanded='false'><i class='mdi mdi-account-settings-variant'></i><span
                            class='hide-menu'>Operacional</span></a>";

                            }
                            ?>

                    <ul aria-expanded="false" class="collapse  first-level">

                            

                                <li class='sidebar-item'> <a class='sidebar-link has-arrow waves-effect waves-dark'
                                    href='javascript:void(0)' aria-expanded='false'><i class='mdi mdi-ferry'></i><span
                                        class='hide-menu'>Empilhadeiras</span></a>

                                        <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="cadastroempilhadeirista.php" class="sidebar-link"><i
                                                class="mdi mdi-pencil-box"></i><span class="hide-menu"> Cadastrar Empilhadeira
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="listaempilhadeira.php" class="sidebar-link"><i
                                                class="mdi mdi-account-card-details"></i><span class="hide-menu"> Lista Empilhadeiras
                                            </span></a></li>
                                </span></a></li>
                                </ul>


                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-walk"></i><span
                                        class="hide-menu">Operadores</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="cadastrooperador.php" class="sidebar-link"><i
                                                class="mdi mdi-pencil-box"></i><span class="hide-menu"> Cadastrar Operadores
                                            </span></a></li>
                                            <?php
                                            if ($_SESSION['tipo'] != 3 && $_SESSION['tipo'] != 5) {
                                            print "
                                            <li class='sidebar-item'><a href='listaoperador.php' class='sidebar-link'><i
                                                class='mdi mdi-seat-recline-extra'></i><span class='hide-menu'> Lista Operador
                                            </span></a></li>";
                                            }?>
                                </span></a></li>
                                </ul>


                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-folder-multiple-outline"></i><span
                                        class="hide-menu">Controle</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="c-combustao.php" class="sidebar-link"><i
                                                class="mdi mdi-gas-station"></i><span class="hide-menu"> Controle - Combustão
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="c-eletrica.php" class="sidebar-link"><i
                                                class="mdi mdi-battery-charging-100"></i><span class="hide-menu"> Controle - Elétrica
                                            </span></a></li>
                                    <li class="sidebar-item"><a href="c-grandeporte.php" class="sidebar-link"><i
                                        class="mdi mdi-bus"></i><span class="hide-menu"> Controle - Grande Porte
                                            </span></a></li>
                                </span></a></li>
                            </ul>

                            <li class="sidebar-item"><a href="relatorioempi.php" class="sidebar-link"><i
                            class="mdi mdi-file-outline"></i><span class="hide-menu"> Relatorio Empilhadeiras
                                </span></a></li>
                    </li>
                        </ul>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-security-home"></i><span
                                class="hide-menu">Portaria</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                        <?php
                            if ($_SESSION['tipo'] != 3 && $_SESSION['tipo'] != 5) {
                                print "
                                    <li class='sidebar-item'><a href='cadastrarvisistante.php' class='sidebar-link'><i
                                        class='mdi mdi-pencil-box'></i><span class='hide-menu'> Cadastrar Visitante
                                    </span></a></li>";

                            }

                            if ($_SESSION['tipo'] != 3 && $_SESSION['tipo'] != 5) {
                                print "
                            <li class='sidebar-item'><a href='entradavisista.php' class='sidebar-link'><i
                                class='mdi mdi-run'></i><span class='hide-menu'> Entrada Visitante
                                    </span></a></li>";
                            }
                            ?>
                            <li class="sidebar-item"><a href="visitaativa.php" class="sidebar-link"><i
                                class="mdi mdi-note-plus"></i><span class="hide-menu"> Visitantes Ativos
                                    </span></a></li>
                            <!-- Apenas Supervisores e Chefes podem ver isso \/-->
                            <?php
                            if ($_SESSION['tipo'] != 3 && $_SESSION['tipo'] != 4 && $_SESSION['tipo'] != 5) {
                                    print "<li class='sidebar-item'><a href='bloqueiovisita.php' class='sidebar-link'><i
                                class='mdi mdi-lock-open-outline'></i><span class='hide-menu'> Bloqueio De Visitantes
                                    </span></a></li>";

                            }?>
                            <li class="sidebar-item"><a href="relatoriovisita.php" class="sidebar-link"><i
                                class="mdi mdi-file-outline"></i><span class="hide-menu"> Relatorio Visitantes
                                    </span></a></li>
                        </span></a></li>
                        </ul>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="#" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                                class="hide-menu">Outros</span></a></li>


                    
                    </ul>
                </li>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>