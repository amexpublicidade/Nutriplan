<?PHP
if($this->Paginator && $this->Paginator->hasPage(2)):
    if(!isset($prev)) $prev='« anterior';
    if(!isset($next)) $next='próximo »';
    if(!isset($separator)) $separator=false;
?>
<nav class="paginator">
    <?PHP
        echo $this->Paginator->prev($prev);
        echo $this->Paginator->numbers(array('separator'=>$separator));
        echo $this->Paginator->next($next);
    ?>
</nav>
<?PHP endif; ?>
