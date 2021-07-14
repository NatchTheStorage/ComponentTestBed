<div class="$ExtraClass">
    <div class="u-container">
        <div class="element-table">
            <% if $Title && $ShowTitle %>
                <h3 class="table-element-title">$Title</h3>
            <% end_if %>
            <div class="table-element-container">
                <table class="table-element">
                    <thead>
                    <th class="table-element-times"></th>
                    <% loop $Headers %>
                        <th class="table-element-headers">$Title</th>
                    <% end_loop %>
                    </thead>

                    <tbody>
                    <% loop $Rows %>
                        <tr class="table-element-rowdivider">
                            <td class="table-element-row-text rowtitle">
                                $Title
                            </td>
                            <% loop $BelongsToTable.Headers %>
                                <td <% if $Last %> class="lastcell" <% end_if %>>
                                    $GetEvent($Up.Up.ID).ContentStuff
                                </td>
                            <% end_loop %>
                        </tr>
                    <% end_loop %>
                    </tbody>
                </table>
            </div>
            <% if $Footnote %>
                <div class="table-element-element-footnotes">
                    $Footnote
                </div>
            <% end_if %>
        </div>
    </div>
</div>