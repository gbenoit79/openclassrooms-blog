<div class="post">
    <h3>
        <?php echo htmlspecialchars($viewData['post']->getTitle()); ?>
        <em>le <?php echo $viewData['post']->getCreationDate(); ?></em>
    </h3>
    
    <p>
        <?php
            echo nl2br($viewData['post']->getContent());
        ?>
        
        <?php if (isset($viewData['displayCommentsLink']) && $viewData['displayCommentsLink'] === true): ?>
            <br />
            <em><a href="index.php?controller=post&amp;action=show&amp;postId=<?php echo $viewData['post']->getId(); ?>">Commentaires</a></em>
        <?php endif; ?>
    </p>
</div>