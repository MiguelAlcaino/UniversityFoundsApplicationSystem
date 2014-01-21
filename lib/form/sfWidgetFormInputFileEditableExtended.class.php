<?php 

class sfWidgetFormInputFileEditableExtended extends sfWidgetFormInputFileEditable
{
  protected function getFileAsTag($attributes)
  {
    if ($this->getOption('is_image'))
    {
      return false !== $this->getOption('file_src') ? $this->renderTag('img', array_merge(array('src' => $this->getOption('file_src')), $attributes)) : '';
    }
    else
    {
      return sprintf('<a href="%1$s">Download file</a>', $this->getOption('file_src'));
    }
  }
}
