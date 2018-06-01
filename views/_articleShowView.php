<div class="article">
    <h3>
        <?php echo htmlspecialchars($viewData['article']['titre']); ?>
        <em>le <?php echo $viewData['article']['date_creation_fr']; ?></em>
    </h3>
    
    <p>
        <?php
            echo nl2br(htmlspecialchars($viewData['article']['contenu']));
        ?>
        
        <?php if (isset($viewData['displayCommentsLink']) && $viewData['displayCommentsLink'] === true): ?>
            <br />
            <em><a href="commentList.php?articleId=<?php echo $viewData['article']['id']; ?>">Commentaires</a></em>
        <?php endif; ?>
    </p>
</div>