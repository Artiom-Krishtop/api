
/**
 *
 */
interface Entity
{
  // code...
  function save();
}


Class product implements Entity {
  function save()
  {
    $request->put('product',$this->getJson());
  }
}
