import './boardContent.scss';
import Column from '../Column/Column';
import { initData } from '../../acciones/initData';
import { useState, useEffect } from 'react';
import _, { isEmpty } from 'lodash'
import { isCompositeComponentWithType } from 'react-dom/test-utils';

const BoardContent = () => {
    
    const [board, setBoard] = useState({});
    const [columns, setColumns] = useState([]) ;


    useEffect(()=> {
        const boardInitData = initData.boards.find(item => item.id === 'board-1' );
        if (boardInitData){
            setBoard(boardInitData);

            //ordernar las columnas
            boardInitData.columns.sort((a,b) => 
            boardInitData.columnOrder.indexOf(a.id) - boardInitData.columnOrder.indexOf(b.id))
            setColumns(boardInitData.columns)
        }

    }, []);

    
    if (_.isEmpty(board)){

        return (
            <>
            <div className='not-found'>Board not found</div>


            </>
        )
    }

    return (
        <>
        <div className="board-columns">
            {columns && columns.length > 0 && columns.map((column, index) =>{
                return (
                    <Column 
                    key={column.id}
                    column={column}
                    />

                )
            })}
          
        
      </div>
        </>
    );


}

export default BoardContent;