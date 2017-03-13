<?php 

namespace Thunderlabid\Immigration\Models\Observers;

use Thunderlabid\Immigration\Models\Notaris_RO as Model; 

/**
 * Observer Notaris_RO
 *
 * Digunakan untuk Observe Model Notaris_RO in Link List Mode.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Notaris_ROObserver 
{
	/**
	* Menyimpan dokumen baru
	*
	* @param Notaris_RO $model
	* @return boolean
	*/
	public function saving($model)
	{
		return true;
	}
}