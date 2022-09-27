<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use PDF;

class SearchController extends Controller
{
    public function search()
    {
        $kk = $_GET['ky'];
        
        if (!empty($kk))
        {
            
            $search = Data::where('firstname', 'LIKE', "%{$kk}%")
                                ->orWhere('lastname', 'LIKE', "%{$kk}%")
                                ->orWhere('idno', 'LIKE', "%{$kk}%")
                                ->orWhere('uuid', 'LIKE', "%{$kk}%");
                            
                        
            if ($search->count() > 0)
            {
                $result = $search->take(10)->get();
?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Age</th>
                        <th>Id No</th>
                        <th>Gender</th>
                        <th>Place of birth</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            <tbody> 

<?php
        foreach($result as $rdata){
?>
                    <tr>
                        <td><?php echo $rdata->uuid; ?></td>
                        <td><?php echo $rdata->firstname .' '. $rdata->lastname; ?></td>
                        <td><?php echo $rdata->age.'yrs'; ?></td>
                        <td><?php echo $rdata->idno; ?></td>
                        <td><?php echo $rdata->gender; ?></td>
                        <td><?php echo $rdata->place_of_birth; ?></td>
                        <td><?php echo $rdata->address; ?></td>
                        <td><?php echo $rdata->created_at->diffForHumans(); ?></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="<?php echo route('data.edit', $rdata->id); ?>" class="btn btn-xs btn-primary">Edit</a> 
                                </li>
                                <li class="list-inline-item">
                                    <form action="<?php echo route('data.destroy', $rdata->id); ?>" method="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>"> 
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Sure to proceed?');">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr> 
<?php
                }
                
?>                 
                </tbody>
            </table>    

<?php
            } //end second if
            else{
                echo '<div class="alert alert-warning">Nothing found</div>';
            }
        } //end first if
    } //end method

    public function exportDataToPdf()
    {
        //get all records
        $data = Data::latest()->get();

        //pass records data to view
        $pdf = PDF::loadView('data.pdf', compact('data'));
    
        //download renamed pdf file
        return $pdf->download(time().'-record.pdf');
    }




}
