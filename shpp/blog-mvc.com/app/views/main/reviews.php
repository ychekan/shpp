<?php

/*define(ARTICLE_LIMIT, 15); // Limit count article how we show

$result = new core\models\Select('Article');
$arrResult = $result->getDataByIdLimit(ARTICLE_LIMIT);*/
?>
<div class="box-content" xmlns="http://www.w3.org/1999/html">
    <div class="alert alert-info"> Last article
        <select name="articleCountPage">
            <option name="3" value="3">3</option>
            <option name="5" value="5">5</option>
            <option name="10" value="10">10</option>
            <option name="25" value="25">25</option>
        </select>
    </div>
</div>
<?php

/*
for ($i = count($arrResult) - 1; $i >= 0; --$i) {
*/
    ?>
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
                            <a href="?activity=view&id=<?=$arrResult[$i]['id'];?>" title="View article" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-eye-open icon-white"></i></a>
                            <a href="?activity=delete&id=<?=$arrResult[$i]['id'];?>" onclick ="return confirm('Delete article, are you sure?');" title="Delete article" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-trash icon-white"></i></a>
<!--                            <a href="delete?article=--><?//=$arrResult[$i]['id'];?><!--"  title="Delete article" class="btn btn-close btn-round btn-default"><i-->
<!--                                    class="glyphicon glyphicon-trash icon-white"></i></a>-->
                        </div>
                    </th>
                    <tr class="content-table-site">
                        <td class="content-table-site">

                            <a title="" href="#">
                                <img style="width: 100px; height: 100px;" class="grayscale"
                                     src="./core/upload/<? print_r($arrResult[$i]['uri']); ?>">
                                <span class=" green" style="align-items: flex-end;">6</span>

                            </a>






                            <p>User:&nbsp;<span class="label label-info">Pendigdfgng</span></p>
                            <hr>
                            <p>Status: <span class="label-warning label label-default">Open</span><br/></p>
                            <p><i class="glyphicon glyphicon-calendar"></i>&nbsp;Date:<?= date("d-m-Y"); ?></p>
                        </td>
                        <td class="odd">
                            <a href=""><h5><?php print_r($arrResult[$i]['title']); ?></h5></a>
                            <?php print_r($arrResult[$i]['content']); ?>&nbsp;<a href="">read more...</a>
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
    <?php
} ?>
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
