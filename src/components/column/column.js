import './Column.scss';
import Card from '../Card/Card';




const Column = (props) => {

    const { column } = props ;
    
    return (

        <>

    <div className="columns">
        <header>{column.title}</header>
            <ul className='card-list'>
                <Card />
                <li className='card-item'>second</li>
              <li className='card-item'>third</li>
              <li className='card-item'>fourth</li>
              <li className='card-item'>second</li>
              <li className='card-item'>third</li>
              <li className='card-item'>fourth</li>
              <li className='card-item'>second</li>
              <li className='card-item'>third</li>
              <li className='card-item'>fourth</li>
            </ul>
            <footer>add another card...</footer>

        </div>
    
    
    
    
    </>
    )
    





}

export default Column;