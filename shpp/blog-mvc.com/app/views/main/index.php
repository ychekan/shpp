<div class="box-content" xmlns="http://www.w3.org/1999/html">
    <div class="alert alert-info"> Last article
    </div>
</div>

<? foreach ($db_content as $value): ?>

    <div class="box-content">
        <div class="box-inner">
            <div class="box-content">

                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable"
                       id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <th class="content-table-site">Image & activity</th>
                    <th class="content-table-site">Content
                        <div class="box-icon">
                            <a href="olddelete.php" title="Edit article" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-pencil"></i></a>
                            <a href="../posts/view/4/" title="View article"
                               class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-eye-open icon-white"></i></a>
                            <a href="../posts/delete/4/" onclick="return confirm('Delete article, are you sure?');"
                               title="Delete article" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-trash icon-white"></i></a>
                            <!--                            <a href="delete?article=-->
                            <!--"  title="Delete article" class="btn btn-close btn-round btn-default"><i-->
                            <!--                                    class="glyphicon glyphicon-trash icon-white"></i></a>-->
                        </div>
                    </th>
                    <tr class="content-table-site">
                        <td class="content-table-site">

                            <a title="" href="#">
                                <img style="width: 100px; height: 100px;" class="grayscale"
                                     src="./core/upload/">
                                <span class=" green" style="align-items: flex-end;">6</span>

                            </a>


                            <p>User:&nbsp;<span class="label label-info">Pendigdfgng</span></p>
                            <hr>
                            <p>Status: <span class="label-warning label label-default"><?=$value['status']?></span><br/></p>
                            <p><i class="glyphicon glyphicon-calendar"></i>&nbsp;Date:</p>
                        </td>
                        <td class="odd">
                            <a href=""><h5><?= $value['title']; ?></h5></a><?= $value['content']; ?><a
                                href="">read
                                more...</a>
                            <p>
                            <h1>
                                <blockquote class="pull-right"><i class="glyphicon glyphicon-comment"></i>
                                    <a href="#">&nbsp;Comment:&nbsp;<span class="yellow">254</span></a>
                                </blockquote>
                            </h1>
                            </p>
                        </td>

                    </tr>

                    <!--/row-->

                </table>

            </div>
        </div>
    </div>
<? endforeach; ?>
<div class="box-content">
    <!--    <div class="alert alert-info">-->
    <div class="box-inner">
        <div class="col-md-12 center-block">
            <ul class="pagination">
                <li class="next">
                    <a href="#"><i class="glyphicon glyphicon-backward"></i> Previous</a>
                </li>
                <li>
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li class="next">
                    <a href="#">Next <i class="glyphicon glyphicon-forward"></i> </a>
                </li>
            </ul>
        </div>
    </div>
    <!--    </div>-->
</div>
