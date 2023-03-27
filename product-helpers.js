// Array containing all headings from master_product_data table
let headingArr = ['part','series','family','brand','coo','tool_type','sub_type','code_sort','part_description','coating','grade','ic','height','width','thickness','designation','shape','flutes','edge_prep','pilot_dia','outer_dimension','inner_dimension','torx_type','l1','step_dia','l2','step_radius','helix','uncoated_where_available','none','altin','nf1','fx3','fx2','ticn','tin','tiain','fx1','fx5','fx7','cut_dia_in_display','cut_dia_m_display','shank_dia_m_display','shank_dia_in_display','loc_in_display','loc_m_display','oal_in_display','oal_m_display','radius_in_display','radius_m_display','angle_display','reach_in_display','reach_m_display','neck_dia_in_display','taps_sub_cat','taps_thread_size','taps_thread_limit','tap_taper','taps_plug','taps_bottom','taps_chamfer_type','taps_material','taps_helix','taps_min_tap_drill_size','taps_max_tap_drill_size','taps_standard','taps_projection','taps_pipe_size','taps_class_of_fit','taps_tap_size','taps_size','taps_pipe_tap_size','taps_hole','taps_od1','taps_coolant_duct_type','taps_none','taps_tiain','taps_tin','taps_type','taps_go_nogo','taps_handle','taps_amount','taps_size','taps_m_size','taps_dia','taps_body','taps_shank','taps_square','taps_depth','eco','edp_weldon_flat','min_bore','max_bore','projection','taps_thread_length','taps_drill_length','chamfer','ldr','drillsize','thread','wire','drillsizemm','flutelength','bodydia2','split','tool','single','double','aluma','c2','c5','style','diasize','diadec','drillpoint','weldon','orderit','wiper','edgelength','x','customimage','iso_code','ground','unground','a30','a60','a90','tpi','neck_length'];
let series = document.getElementsByClassName('table-title');
headingArr.forEach( heading => {
    let attElement = document.getElementsByClassName(heading);
    if(attElement.length != 0) {
        
        let attList = attElement[0];
        
        let attTable = attElement[1];
       
        // Need this second attribute table variable becuase sometimes an icon has the same name, so need grab the value of the next html element in the array to display changes below
        let attTable2 = attElement[2];
        let attributeText = attElement[0].innerHTML;
        
        // Switch case to match attribute text and change text from shorthand to actual attributes
        switch (attributeText) {
            case 'cut_dia_in_display':
            case 'cut_dia_m_display':
            case 'outer_dimension':
                if(series[0].classList.contains('THREADING')) {
                    attList.innerHTML = "Cutter Dia.(D<sub>1</sub>)"
                    attTable.innerHTML = "Cutter Dia.(D<sub>1</sub>)";
                    break;
                } else {
                    attList.innerHTML = "Diameter(D<sub>1</sub>)"
                    attTable.innerHTML = "Diameter(D<sub>1</sub>)";
                    break;
                }
                break;
            case 'shank_dia_in_display':
            case 'shank_dia_m_display':
                attList.innerHTML = "Shank(D)";
                attTable.innerHTML = "Shank(D)";
                break;
            case 'oal_in_display':
            case 'oal_m_display':
                attList.innerHTML = "OAL(L)";
                attTable.innerHTML = "OAL(L)";
                break;
            case 'loc_in_display':
            case 'loc_m_display':
            case 'flutelength':
                // loc_in_display title is Flute Length for Holemaking products
                if(series[0].classList.contains('HOLEMAKING')) {
                    attList.innerHTML = "Flute Length(L<sub>1</sub>)";
                    attTable.innerHTML = "Flute Length(L<sub>1</sub>)";
                    break;
                } else if(series[0].classList.contains('187') || series[0].classList.contains('189') || series[0].classList.contains('189M')) {
                    attList.innerHTML = "Neck Len.(L)";
                    attTable.innerHTML = "Neck Len.(L)";
                    break;
                } else {
                    attList.innerHTML = "LOC(L<sub>1</sub>)";
                    attTable.innerHTML = "LOC(L<sub>1</sub>)";
                    break;
                }
                break;
            case 'taps_thread_size':
                attList.innerHTML = "Thread Size";
                attTable.innerHTML = "Thread Size";
                break;
            case 'taps_thread_limit':
                attList.innerHTML = "Thread Limit";
                attTable.innerHTML = "Thread Limit";
                break;
            case 'radius_in_display':
            case 'radius_m_display':
                attList.innerHTML = "Radius(R)";
                attTable.innerHTML = "Radius(R)";
                break;
            case 'flutes':
                attList.innerHTML = "Flutes";
                attTable.innerHTML = "Flutes";
                break;
            case 'tap_taper':
                attList.innerHTML = "Taper";
                attTable.innerHTML = "Taper";
                break;
            case 'c2':
                attList.innerHTML = "Cut Type";
                attTable.innerHTML = "Cut Type";
                break;
            case 'tool':
                attList.innerHTML = "Tool";
                attTable.innerHTML = "Tool";
                break;
            case 'torx_type':
                attList.innerHTML = "Torx Type";
                attTable.innerHTML = "Torx Type";
                break;
            case 'l1':
                attList.innerHTML = "L1";
                attTable.innerHTML = "L1";
                break;
            case 'l2':
                attList.innerHTML = "L2";
                attTable.innerHTML = "L2";
                break;
            case 'ldr':
                attList.innerHTML = "LDR";
                attTable.innerHTML = "LDR";
                break;
            case 'chamfer':
                attList.innerHTML = "Chamfer";
                attTable.innerHTML = "Chamfer";
                break;
            case 'weldon':
                attList.innerHTML = "Weldon";
                attTable2.innerHTML = "Weldon";
                attTable.innerHTML = "Weldon";
                break;
            case 'reach_in_display':
                if(series[0].classList.contains('THREADING')) {
                    attList.innerHTML = "Neck Dia.(D<sub>2</sub>)";
                    attTable.innerHTML = "Neck Dia.(D<sub>2</sub>)";
                    break;  
                } else {
                    attList.innerHTML = "LBS(L<sub>2</sub>)";
                    attTable.innerHTML = "LBS(L<sub>2</sub>)";
                    break;
                }
                break;
            case 'step_dia':
                attList.innerHTML = "D<sub>2</sub>";
                attTable.innerHTML = "D<sub>2</sub>";
                break;
            case 'none':
                attList.innerHTML = "Bright";
                attTable.innerHTML = "Bright";
                break;
            case 'nf1':
                attList.innerHTML = "NF1";
                attTable2.innerHTML = "NF1";
                break;
            case 'fx2':
                attList.innerHTML = "FX2";
                attTable2.innerHTML = "FX2";
                break;
            case 'fx3':
                attList.innerHTML = "FX3";
                attTable2.innerHTML = "FX3";
                break;
            case 'altin':
                attList.innerHTML = "AlTiN";
                attTable2.innerHTML = "AlTiN";
                break;
            case 'tin':
                attList.innerHTML = "TiN";
                attTable2.innerHTML = "TiN";
                break;
            case 'ticn':
                attList.innerHTML = "TiCN";
                attTable2.innerHTML = "TiCN";
                break;
            case 'coating':
                attList.innerHTML = "Coating";
                attTable.innerHTML = "Coating";
                break;
            case 'angle_display':
                attList.innerHTML = "Incl. Angle";
                attTable.innerHTML = "Incl. Angle";
                break;
            case 'split':
                attList.innerHTML = "Split Length(L<sub>1</sub>)";
                attTable.innerHTML = "Split Length(L<sub>1</sub>)";
                break;
            case 'style':
                attList.innerHTML = "Style";
                attTable.innerHTML = "Style";
                break;
            case 'pilot_dia':
                attList.innerHTML = "Pilot(D)";
                attTable.innerHTML = "Pilot(D)";
                break;
            case 'thickness':
                attList.innerHTML = "Thickness(D<sub>1</sub>)";
                attTable.innerHTML = "Thickness(D<sub>1</sub>)";
                break;
            case 'width':
                attList.innerHTML = "Width(D)";
                attTable.innerHTML = "Width(D)";
                break;
            case 'height':
                attList.innerHTML = "Height(L)";
                attTable.innerHTML = "Height(L)";
                break;
            case 'grade':
                attList.innerHTML = "Grade";
                attTable.innerHTML = "Grade";
                break;
            case 'eco':
                attList.innerHTML = "PAC Drill Size";
                attTable.innerHTML = "PAC Drill Size";
                break;
            // diasize title is Pilot(D1) for some series, while Diameter(D1) for others
            case 'diasize':
                if(series[0].classList.contains('300')) {
                    attList.innerHTML = 'Pilot(D<sub>1</sub>) <span class="small">Size</span>';
                    attTable.innerHTML = 'Pilot(D<sub>1</sub>) <span class="small">Size</span>';
                    break;
                } else {
                    attList.innerHTML = 'Diameter(D<sub>1</sub>) <span class="small">Size</span>';
                    attTable.innerHTML = 'Diameter(D<sub>1</sub>) <span class="small">Size</span>';
                    break;
                }
                break;
            case 'diadec':
                if(series[0].classList.contains('300')) {
                    attList.innerHTML = 'Pilot(D<sub>1</sub>) <span class="small">Dec.</span>';
                    attTable.innerHTML = 'Pilot(D<sub>1</sub>) <span class="small">Dec.</span>';
                    break;
                } else {
                    attList.innerHTML = 'Diameter(D<sub>1</sub>) <span class="small">Dec.</span>';
                    attTable.innerHTML = 'Diameter(D<sub>1</sub>) <span class="small">Dec.</span>';
                    break;
                }
                break;
            case 'eco':
                attList.innerHTML = "PAC Drill Size";
                attTable.innerHTML = "PAC Drill Size";
                break;
            case 'drillpoint':
                attList.innerHTML = "Drill Point";
                attTable.innerHTML = "Drill Point";
                break;
            case 'min_bore':
                attList.innerHTML = "Minimum Bore";
                attTable.innerHTML = "Minimum Bore";
                break;
            case 'max_bore':
                attList.innerHTML = "Maximum Bore";
                attTable.innerHTML = "Maximum Bore";
                break;
            case 'projection':
                attList.innerHTML = "Projection";
                attTable.innerHTML = "Projection";
                break;
            case 'taps_standard':
                attList.innerHTML = "Standard";
                attTable.innerHTML = "Standard";
                break;
            case 'neck_length':
                attList.innerHTML = "Neck Len.(L<sub>2</sub>)";
                attTable.innerHTML = "Neck Len.(L<sub>2</sub>)";
                break;
            case 'neck_dia_in_display':
                attList.innerHTML = "Neck Dia.(L<sub>2</sub>)";
                attTable.innerHTML = "Neck Dia.(L<sub>2</sub>)";
                break;
            case 'helix':
                attList.innerHTML = "Helix";
                attTable.innerHTML = "Helix";
                break;
            case 'taps_chamfer_type':
            case 'taps_go_nogo':
                attList.innerHTML = "Type";
                attTable.innerHTML = "Type";
                break;
            case 'taps_min_tap_drill_size':
                attList.innerHTML = "Min Tap/Drill Size";
                attTable.innerHTML = "Min Tap/Drill Size";
                break;
            case 'taps_max_tap_drill_size':
                attList.innerHTML = "Max Tap/Drill Size ";
                attTable.innerHTML = "Max Tap/Drill Size";
                break;
            case 'taps_pipe_size':
                attList.innerHTML = "Pipe Size";
                attTable.innerHTML = "Pipe Size";
                break;
            case 'taps_class_of_fit':
                attList.innerHTML = "Class of Fit";
                attTable.innerHTML = "Class of Fit";
                break;
            case 'taps_drill_length':
                attList.innerHTML = "Drill Len.(L<sub>1</sub>)";
                attTable.innerHTML = "Drill Len.(L<sub>1</sub>)";
                break;
            case 'taps_thread_length':
                attList.innerHTML = "Thread Len.(L<sub>2</sub>)";
                attTable.innerHTML = "Thread Len.(L<sub>2</sub>)";
                break;
            case 'taps_od1':
                attList.innerHTML = "Outside Dia.";
                attTable.innerHTML = "Outside Dia.";
                break;
            case 'taps_tap_size':
            case 'taps_size':
                attList.innerHTML = "Tap Size";
                attTable.innerHTML = "Tap Size";
                break;
            case 'taps_dia':
                attList.innerHTML = "Tap Dia.(A)";
                attTable.innerHTML = "Tap Dia.(A)";
                break;
            case 'taps_body':
                attList.innerHTML = "Body Dia.(B)";
                attTable.innerHTML = "Body Dia.(B)";
                break;
            case 'taps_shank':
                attList.innerHTML = "Shank(C)";
                attTable.innerHTML = "Shank(C)";
                break;
            case 'taps_square':
                attList.innerHTML = "Square Size(D)";
                attTable.innerHTML = "Square Size(D)";
                break;
            case 'taps_depth':
                attList.innerHTML = "Depth Tap Enters";
                attTable.innerHTML = "Depth Tap Enters";
                break;
            case 'taps_handle':
                attList.innerHTML = "Handle";
                attTable.innerHTML = "Handle";
                break;
            case 'description':
            case 'part_description':
                console.log('hello')
                attList.innerHTML = "Description";
                attTable.innerHTML = "Description";
                break;
            case 'taps_amount':
                attList.innerHTML = "Amount";
                attTable.innerHTML = "Amount";
                break;
            case 'ic':
                attList.innerHTML = "IC";
                attTable.innerHTML = "IC";
                break;
          
        }
    }
    
});



// Specialty Series 780 Diamond Cut Style Images
let specialtyImage = document.getElementsByClassName('customimage');
if(specialtyImage.length != 0) {
    let specialtyImageDiv = specialtyImage[0].nextSibling;
    console.log(specialtyImageDiv);
    let imageText = specialtyImageDiv.innerHTML;
    // console.log(imageText);
    switch (imageText) {
        case 'noend':
            specialtyImageDiv.innerHTML = '<p class="att">Style A - No End Cut <img class="specialty-img" src="/wp-content/themes/storefront-child/products/images/780A_catalog.png"></p>';
            break;
        case 'burrend':
            specialtyImageDiv.innerHTML = '<p class="att">Style B - Burr End Cut <img class="specialty-img" src="/wp-content/themes/storefront-child/products/images/780B_catalog.png"></p>';
            break;
        case 'endmill':
            specialtyImageDiv.innerHTML = '<p class="att">Style C - End Mill Style <img class="specialty-img" src="/wp-content/themes/storefront-child/products/images/780C_catalog.png"></p>';
            break;
        case 'drillpoint':
            specialtyImageDiv.innerHTML = '<p class="att">Style D - Drill Point <img class="specialty-img" src="/wp-content/themes/storefront-child/products/images/780D_catalog.png"></p>';
            break;
        case 'fishtail':
            specialtyImageDiv.innerHTML = '<p class="att">Style F - Fishtail End <img class="specialty-img" src="/wp-content/themes/storefront-child/products/images/780F_catalog.png"></p>';
            break;
    }
}

// Function to help resize iso material elements on product page.
let isoMats = document.getElementsByClassName('iso-mats')[0];

if(isoMats) {
    let isoMatsSizer = () => {
        let isoWidth = isoMats.getBoundingClientRect().width;
        console.log(isoWidth)
        let mats = document.getElementsByClassName('mat');

        // sets width of individual iso materials to 13 columns of 'iso-mats' row.
        for (let mat of mats) {
            
            let matWidth = isoWidth/13 - 2;
            mat.style.width = `${matWidth}px`;   
        }    
    }
    isoMatsSizer();
}

// runs each time the browser is resized so width of iso materials columns continue to change
window.onresize = () => {
    isoMatsSizer();
}

let isoDots = document.getElementsByClassName('dot');
// console.log(isoDot);

for (let dot of isoDots) {
    let dotValue = dot.firstElementChild.innerHTML;

    if(dotValue.includes('good')) {
        dot.innerHTML = '&#9675;';
    } else if (dotValue.includes('best')) {
        dot.innerHTML = '&#11044;';
    } else {
        dot.innerHTML = '';
    }

}

// Specialty Series Cut Type Image changer (Example Series 310A)
let cutType = document.getElementsByClassName('c2')[0];
if(cutType) {
    let cutTypeDiv = cutType.nextSibling;
    let cutTypeText = cutTypeDiv.innerHTML;
    let imgDiv = document.createElement('div');
    cutTypeDiv.append(imgDiv);
    switch (cutTypeText) {
        case 'Single Cut':
            imgDiv.innerHTML = '<img class="cuttype-img" src="/wp-content/themes/storefront-child/products/icons/singlecut.png">';
            break;
        case 'Double Cut':
            imgDiv.innerHTML = '<img class="cuttype-img" src="/wp-content/themes/storefront-child/products/icons/doublecut.png">';
            break;
        case 'Aluma Cut':
            imgDiv.innerHTML = '<img class="cuttype-img" src="/wp-content/themes/storefront-child/products/icons/alumacut.png">';
            break; 
    }
}

// Speed and Feed button (only shows on Products/Series with Speed and Feed Pages)
let speedFeed = document.getElementsByClassName('speedandfeed')[0];