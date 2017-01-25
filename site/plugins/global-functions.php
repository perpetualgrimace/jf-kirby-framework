<?

// sanitize strings
function sanitize( $string ) {
  return strtolower( preg_replace( '/[^a-z0-9]/i', '-', $string ));
}

// remove hash
function dehash( $string ) {
  return str_replace( '#', '', $string );
}

function sanitizePhone( $string ) {
  return preg_replace( '/[^0-9\+]/i', '', $string );
}

?>
