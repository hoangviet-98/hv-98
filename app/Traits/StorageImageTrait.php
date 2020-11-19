<!-- <?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($requestProduct, $fieldName, $folderName)
    {
        if ($requestProduct->hasFile($fieldName)) {
            $file = $requestProduct->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random('20') . '.' . $file->getClientOriginalExtension();
            $filePath = $requestProduct->file('pro_avatar')->storeAs('/public/' . $folderName, $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;

        }
        return null;

    }
}
 -->