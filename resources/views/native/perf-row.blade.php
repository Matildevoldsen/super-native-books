<list-item
    :leadingMonogram="(string)($index % 26)"
    :leadingMonogramColor="'#' . substr(md5((string)$index), 0, 6)"
    :headline="'Row ' . $index"
    :supporting="'subtitle for row ' . $index" />
