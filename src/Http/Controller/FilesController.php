<?php namespace Anomaly\WysiwygFieldType\Http\Controller;

use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\WysiwygFieldType\Table\FileTableBuilder;
use Anomaly\WysiwygFieldType\Table\ValueTableBuilder;

/**
 * Class FilesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FilesController extends AdminController
{

    /**
     * Return an index of existing files.
     *
     * @param  FileTableBuilder                           $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FileTableBuilder $table)
    {
        return $table
            ->setMode($this->request->get('mode', 'file'))
            ->render();
    }

    /**
     * Return a list of folders to choose from.
     *
     * @param  FolderRepositoryInterface $folders
     * @return \Illuminate\View\View
     */
    public function choose(FolderRepositoryInterface $folders)
    {
        return $this->view->make(
            'anomaly.field_type.wysiwyg::choose',
            [
                'folders' => $folders->all(),
            ]
        );
    }

    /**
     * Return a table of selected files.
     *
     * @param  ValueTableBuilder $table
     * @return null|string
     */
    public function selected(ValueTableBuilder $table)
    {
        return $table->setUploaded(explode(',', $this->request->get('uploaded')))->make()->getTableContent();
    }
}
