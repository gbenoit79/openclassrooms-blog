<ul class="pagination">
<?php if ($viewData['pagination']['currentPage'] != $viewData['pagination']['startPage']): ?>
    <li class="page-item">
        <a class="page-link" href="?page=<?php echo $viewData['pagination']['startPage']; ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
        </a>
    </li>
<?php endif; ?>
<?php if ($viewData['pagination']['currentPage'] >= 2): ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $viewData['pagination']['previousPage']; ?>"><?php echo $viewData['pagination']['previousPage']; ?></a></li>
<?php endif; ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $viewData['pagination']['currentPage']; ?>"><?php echo $viewData['pagination']['currentPage']; ?></a></li>
<?php if ($viewData['pagination']['currentPage'] != $viewData['pagination']['endPage']): ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $viewData['pagination']['nextPage']; ?>"><?php echo $viewData['pagination']['nextPage']; ?></a></li>
<?php endif; ?>
<?php if ($viewData['pagination']['currentPage'] != $viewData['pagination']['endPage']): ?>
    <li class="page-item">
        <a class="page-link" href="?page=<?php echo $viewData['pagination']['endPage']; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
        </a>
    </li>
<?php endif; ?>
</ul>