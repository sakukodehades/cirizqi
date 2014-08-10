 <ul class="sidebar-menu">
                        <li>
                            <a href="<?=site_url('barang');?>">
                                <i class="fa fa-dashboard"></i> <span>Barang</span>
                            </a>
                        </li>                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Pembelian</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=site_url('pembelian/index');?>"><i class="fa fa-angle-double-right"></i> Daftar Pembelian</a></li>
                                <li><a href="<?=site_url('pembelian/transaksi');?>"><i class="fa fa-angle-double-right"></i> Transaksi Pembelian</a></li>                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Penjualan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> Daftar Penjualan</a></li>
                                <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Transaksi Penjualan</a></li>                                
                            </ul>
                        </li>
                       
                    </ul>
