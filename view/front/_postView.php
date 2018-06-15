<article class="blog-post">
    <h2 class="blog-post-title"><?php echo htmlspecialchars($viewData['post']->getTitle()); ?></h2>
    <p class="blog-post-meta"><?php echo $viewData['post']->getCreationDate(); ?></em></p>
    
    <p>
        <?php
            echo nl2br($viewData['post']->getContent());
        ?>
        
        <?php if (isset($viewData['displayCommentsLink']) && $viewData['displayCommentsLink'] === true): ?>
            <br />
            <em><a href="index.php?controller=post&amp;action=show&amp;postId=<?php echo $viewData['post']->getId(); ?>">Commentaires</a></em>
        <?php endif; ?>
    </p>
</article>