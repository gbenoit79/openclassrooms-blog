<div class="article">
    <h3>
        <?php echo htmlspecialchars($viewData['article']->getTitle()); ?>
        <em>le <?php echo $viewData['article']->getCreationDate(); ?></em>
    </h3>
    
    <p>
        <?php
            echo nl2br(htmlspecialchars($viewData['article']->getContent()));
        ?>
        
        <?php if (isset($viewData['displayCommentsLink']) && $viewData['displayCommentsLink'] === true): ?>
            <br />
            <em><a href="commentList.php?articleId=<?php echo $viewData['article']->getId(); ?>">Commentaires</a></em>
        <?php endif; ?>
    </p>
</div>